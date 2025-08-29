<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 350px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #444;
        }
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        input:focus {
            border-color: #4e73df;
            outline: none;
            box-shadow: 0 0 5px rgba(78, 115, 223, 0.5);
        }
        button {
            width: 100%;
            padding: 10px;
            background: #4e73df;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #3751c1;
        }
        p {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }
        p a {
            color: #1cc88a;
            text-decoration: none;
            font-weight: bold;
        }
        p a:hover {
            text-decoration: underline;
        }
        .alert {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 6px;
            text-align: center;
            margin-bottom: 15px;
            border: 1px solid #f5c6cb;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        @if(session('error'))
            <div class="alert">{{ session('error') }}</div>
        @endif

        <h1>Daftar Akun</h1>
        <form action="/register/submit" method="post">
            @csrf

            <label for="name">Nama</label>
            <input type="text" id="name" name="name" placeholder="Masukkan Nama" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Masukkan Email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Masukkan Password" required>

            <button type="submit">Daftar</button>
        </form>
        <p>Sudah punya akun? <a href="/login">Login disini</a></p>
    </div>
</body>
</html>