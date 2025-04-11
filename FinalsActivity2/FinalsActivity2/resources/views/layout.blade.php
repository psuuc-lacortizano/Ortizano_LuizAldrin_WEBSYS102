<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book System</title>
    <style>
        :root {
            --primary-color: #000000;
            --secondary-color: #ffffff;
            --accent-color: #444444;
            --border-color: #d4d4d4;
            --text-color: #111111;
            --radius: 6px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', 'Segoe UI', 'Helvetica Neue', sans-serif;
            background-color: var(--secondary-color);
            color: var(--text-color);
            padding: 3rem 1rem;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: var(--secondary-color);
            padding: 2.5rem;
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        }

        h1 {
            font-size: 1.8rem;
            margin-bottom: 1.8rem;
            color: var(--primary-color);
            font-weight: 600;
        }

        label {
            display: block;
            margin-top: 1.2rem;
            font-weight: 500;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 0.6rem 0.8rem;
            font-size: 1rem;
            margin-top: 0.5rem;
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            background: #f9f9f9;
            transition: all 0.3s;
        }

        input:focus {
            outline: none;
            border-color: var(--accent-color);
            background: #fff;
            box-shadow: 0 0 0 2px rgba(0,0,0,0.1);
        }

        button {
            margin-top: 2rem;
            padding: 0.7rem 1.5rem;
            background: var(--primary-color);
            color: var(--secondary-color);
            border: none;
            border-radius: var(--radius);
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #222;
        }

        a {
            text-decoration: none;
            color: var(--primary-color);
            font-weight: 500;
            margin-right: 1rem;
        }

        a:hover {
            text-decoration: underline;
        }

        ul {
            list-style: none;
            margin-top: 2rem;
        }

        li {
            background: #f7f7f7;
            border: 1px solid var(--border-color);
            padding: 1rem;
            margin-bottom: 1rem;
            border-left: 4px solid var(--primary-color);
            border-radius: var(--radius);
        }

        form {
            display: inline;
        }

        .top-action {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .top-action a {
            background: var(--primary-color);
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: var(--radius);
            font-size: 0.9rem;
        }

        .top-action a:hover {
            background: #222;
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
