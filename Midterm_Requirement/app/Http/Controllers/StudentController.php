<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // displaying students
    public function dashboard()
    {
        return view('dashboard');
    }

    // displaying students
    public function index()
    {
        $students = DB::table('students')->get();
        return view('index', compact('students'));
    }

    // Create student form
    public function create()
    {
        $courses = DB::select('SELECT * FROM courses');
        return view('create', compact('courses'));
    }

    // Add student and enroll in courses
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stud_code' => 'required|unique:students|regex: /^(\d{2})-UR-(\d{4})$/',
            'program' => 'required'
        ]);

        DB::insert('INSERT INTO students (name, stud_code, program, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())', [
            $request['name'],
            $request['stud_code'],
            $request['program'],
        ]);

        $student_id = DB::getPdo()->lastInsertId();
        $courses = DB::select('SELECT id FROM courses WHERE course_code LIKE ?', [$request['program'] . '%']);

        foreach ($courses as $course) {
            DB::insert('INSERT INTO enrollments (stud_id, course_id, grades, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())', [
                $student_id,
                $course->id,
                0.00
            ]);
        }

        return redirect('/student')->with('success', 'Student registered and enrolled successfully!');
    }

    // Edit student info
    public function edit($id)
    {
        $student = DB::select('SELECT * FROM students WHERE id = ?', [$id]);
        $courses = DB::select('SELECT * FROM courses');
        return view('edit', compact('student', 'courses'));
    }

    // Update student info
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'stud_code' => 'required|unique:students|regex: /^(\d{2})-UR-(\d{4})$/',
            'program' => 'required'
        ]);

        $currentProgram = DB::select('SELECT program FROM students WHERE id = ?', [$id])[0]->program;

        if ($request['program'] != $currentProgram) {
            DB::delete('DELETE FROM enrollments WHERE stud_id = ?', [$id]);

            $courses = DB::select('SELECT id FROM courses WHERE course_code LIKE ?', [$request['program'] . '%']);
            foreach ($courses as $course) {
                DB::insert('INSERT INTO enrollments (stud_id, course_id, grades, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())', [
                    $id,
                    $course->id,
                    0.00
                ]);
            }
        }

        DB::update('UPDATE students SET name = ?, stud_code = ?,  program = ?, updated_at = NOW() WHERE id = ?', [
            $request['name'],
            $request['stud_code'],
            $request['program'],
            $id,
        ]);

        return redirect('/student')->with('success', 'Student updated successfully!');
    }

    // Delete student
    public function destroy($id)
    {
        DB::delete('DELETE FROM students WHERE id = ?', [$id]);
        return redirect('/student')->with('success', 'Student deleted successfully!');
    }

    // Show student info and enrolled courses
    public function showInfo($id)
    {
        $student = DB::select('SELECT id, name, stud_code, created_at, updated_at FROM students WHERE id = ?', [$id]);

        if (empty($student)) {
            return redirect('/student')->with('error', 'Student not found!');
        }

        $student = $student[0];

        $courses = DB::select('
            SELECT courses.course_name, courses.course_code, enrollments.id, enrollments.grades, enrollments.status
            FROM enrollments
            INNER JOIN courses ON enrollments.course_id = courses.id
            WHERE enrollments.stud_id = ?', [$id]
        );

        return view('show-info', compact('student', 'courses'));
    }

    // Edit grade 
    public function editGrade($id)
    {
        $course = DB::select('
            SELECT courses.course_name, courses.course_code, enrollments.id, enrollments.grades, enrollments.status
            FROM enrollments
            INNER JOIN courses ON enrollments.course_id = courses.id
            WHERE enrollments.id = ?', [$id]
        );

        if (empty($course)) {
            return redirect('/info/{id}')->with('error', 'Course not found!');
        }

        return view('edit-grade', ['course' => $course[0]]);
    }

    // Update grade
    public function updateGrade(Request $request, $id)
    {
        $request->validate([
            'grades' => 'required|numeric|min:0|max:100',
        ]);

        $newGrade = $request->grades;

        DB::update('UPDATE enrollments SET grades = ?, updated_at = NOW() WHERE id = ?', [$newGrade, $id]);

        $student = DB::select('
            SELECT students.id 
            FROM enrollments 
            INNER JOIN students 
            ON enrollments.stud_id = students.id 
            WHERE enrollments.id = ?',
            [$id]
        );

        if (!empty($student)) {
            return redirect('/info/' . $student[0]->id)->with('success', 'Grade updated successfully!');
        }

        return redirect('/info/{id}')->with('error', 'Student not found!');
    }

    // Show all courses
    public function showCourses()
    {
        $courses = DB::select('SELECT * FROM courses');
        return view('course/courses', compact('courses'));
    }

    // Create course 
    public function createCourse()
    {
        return view('/course/course-create');
    }

    // Add course
    public function addCourse(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string|max:255',
            'course_code' => 'required|string|unique:courses,course_code|max:255',
        ]);

        DB::insert('INSERT INTO courses (course_name, course_code) VALUES (?, ?)', [
            $request['course_name'],
            $request['course_code']
        ]);

        return redirect('/courses')->with('success', 'Course added successfully!');
    }

    // Edit course 
    public function editCourse($id)
    {
        $course = DB::select('SELECT * FROM courses WHERE id = ?', [$id]);
        return view('/course/course-edit', compact('course'));
    }

    // Update course
    public function updateCourse(Request $request, $id)
    {
        $request->validate([
            'course_name' => 'required|string|max:255',
            'course_code' => 'required|string|unique:courses,course_code,' . $id,
        ]);

        DB::update('UPDATE courses SET course_name = ?, course_code = ? WHERE id = ?', [
            $request['course_name'],
            $request['course_code'],
            $id,
        ]);

        return redirect('/course/courses')->with('success', 'Course updated successfully!');
    }

    // Delete course
    public function destroyCourse($id)
    {
        DB::delete('DELETE FROM courses WHERE id = ?', [$id]);
        return redirect('/courses')->with('success', 'Course deleted successfully!');
    }

    // Show all enrollments
    public function showEnrollment()
{
    $enrollments = DB::select('
        SELECT 
            students.id AS student_id,
            students.name AS student_name,
            students.stud_code,
            GROUP_CONCAT(CONCAT(courses.course_name, " (Grade: ", enrollments.grades, ")") SEPARATOR "|") AS courses
        FROM enrollments
        JOIN students ON enrollments.stud_id = students.id
        JOIN courses ON enrollments.course_id = courses.id
        GROUP BY students.id, students.name, students.stud_code
    ');

    return view('enrollment/enrollment', compact('enrollments'));
}


    // Delete enrollment
    public function destroyEnrollment($id)
    {
        DB::delete('DELETE FROM enrollments WHERE stud_id = ?', [$id]);
        return redirect('/enrollment')->with('success', 'All enrollments for the student were deleted successfully!');
    }
}
