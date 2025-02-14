<style>
        body {
            display: flex;
            justify-content: center;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            font-size: 24px;
            color: #333;
        }

        .table-info {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .table-info th,
        .table-info td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .table-info th {
            background-color: #f1f1f1;
            font-weight: 600;
        }

        .table-info tr:last-child td {
            border-bottom: none;
        }

        .table-info td {
            color: #555;
        }

        .action-links {
            margin-top: 15px;
        }

        .action-links a {
            display: inline-block;
            padding: 8px 15px;
            margin: 5px;
            color: white;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.2s;
        }

        .action-links a:hover {
            background-color: #0056b3;
        }
    </style>