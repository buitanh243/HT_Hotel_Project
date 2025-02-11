<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;        
    }

    .container {
        width: 100%;
        max-width: 1200px;
        margin: 100px auto;
        padding: 0 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .login-form {
        height: 400px;
        width: 100%;
        max-width: 400px;
        background-color: white;
        padding: 0 30px 0 30px;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .login-form h1 {
        text-align: center;
        color: #333;
    }

    .login-form input {
        padding: 15px;
        margin: 15px 0 15px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 100%;
        box-sizing: border-box;
    }

    .login-form button {
        margin-top: 15px;
        padding: 15px;
        border: none;
        border-radius: 5px;
        background-color: #333;
        color: white;
        cursor: pointer;
        font-size: 16px;
    }

    .login-form button:hover {
        background-color: #555;
    }
</style>