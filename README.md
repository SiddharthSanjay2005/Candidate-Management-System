# Student Performance & Candidate Management System

## 📌 Project Overview:-
This project is a comprehensive **web-based Candidate Management System** designed to manage student academic records efficiently. It handles student details, attendance tracking, internal and external marks, semester-wise performance, fee management, and administrative actions. The system supports three distinct user roles: **Admin**, **Faculty**, and **Student**, each with tailored access and functionalities. The frontend is built using **HTML, CSS, and JavaScript**, while the backend leverages **PHP and MySQL**. Additionally, **Power BI** is integrated for advanced data visualization and analytics.


## ✨ Features:-

### 🔐 Role-Based Login System:
- **Admin Login** – Full system control.
- **Faculty Login** – Manage marks, attendance, and assignments.
- **Student Login** – View performance and academic records.

### 👨‍💼 Admin Functionalities:
- Add new students to the system.
- Remove detained students.
- Manage fee records for all students.
- Oversee overall system activity.

### 👩‍🏫 Faculty Functionalities:
- Assign internal and external marks.
- Record project and assignment completion.
- Mark daily/weekly attendance.
- Update student performance records.

### 🧑‍🎓 Student Functionalities:
- View semester-wise attendance.
- Check internal and external marks.
- Track project/assignment status.
- Monitor overall academic performance.

### 📊 Power BI Integration:
- Interactive dashboards for performance analytics.
- Visualizations of attendance trends, mark distributions, and fee status.
- Semester-wise and student-wise reports.


## 🛠️ Technologies Used:-

| Layer       | Technologies                          |
|-------------|----------------------------------------|
| Frontend    | HTML, CSS, JavaScript                  |
| Backend     | PHP                                    |
| Database    | MySQL                                  |
| Analytics   | Power BI                               |
| Server      | Apache (XAMPP/WAMP recommended)        |


## 📁 Database Schema (MySQL):-

### Key Tables:
- `students` – Student personal and academic info.
  
- `attendance` – Daily/weekly attendance records.
  
- `marks` – Internal and external marks.
  
- `assignments` – Project/assignment submissions.
  
- `fees` – Fee payment status.
  
- `users` – Login credentials and roles.

> 💡 *Full schema can be exported from the `database.sql` file included in the project.*


## 🖥️ Setup & Installation:-

### Prerequisites:
- XAMPP / WAMP / LAMP
  
- MySQL
  
- Web browser
  
- Power BI Desktop (for visualization editing)

### Steps to Run:-

1. **Clone or download the project**
   ```bash
   git clone https://github.com/your-username/candidate-management-system.git

2. Move project to server directory:-

   For XAMPP: C:/xampp/htdocs/candidate-management-system

3. Start Apache & MySQL from XAMPP Control Panel.

4. Import Database:-
   Open phpMyAdmin (http://localhost/phpmyadmin)

   Create a database: cms_db
  
   Import the file: database/cms_db.sql

5. Configure Database Connection:-
   
   Edit config/db_connect.php with your MySQL credentials.

7. Run the Application:-
   
   Open browser and go to: http://localhost/candidate-management-system


<br>

🔧 Useful Commands:-

Git Commands:

git init

git add .

git commit -m "Initial commit"

git branch -M main

git remote add origin https://github.com/your-username/repo-name.git

git push -u origin main


<br>

📈 Future Improvements:-

✅ Email/SMS notifications for fee reminders and attendance alerts.

✅ Parent/Guardian login to monitor student progress.

✅ Online fee payment gateway integration (Razorpay/PayPal).

✅ Automated detained student notification system.

✅ Mobile-responsive design optimization.

✅ Export reports to PDF/Excel for offline use.

✅ Real-time Power BI dashboard embedded in the web app.

✅ Multi-semester comparison graphs for student performance.

✅ Role-based dynamic menu generation.

✅ Two-factor authentication (2FA) for admin accounts.

<br>

🙏 Acknowledgments:-

Thanks to the open-source community for PHP, MySQL, and Power BI tools.

Special thanks to faculty mentors and project reviewers.

Icons by FontAwesome & Bootstrap Icons.

<br>

👨‍💻 Author:-

Siddharth  Sanjay

📧 siddusanjay2005@gmail.com

<br>

📬 Support:-

For any issues or feature requests, feel free to raise an issue on GitHub or contact the author directly.
