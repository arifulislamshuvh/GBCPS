<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bangla College Physics Society</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            /* Equation Variables */
            --equation-font-size: 2rem; /* Adjusted for mobile */
            --equation-glow-rate: 3s; /* Glow animation speed */
            --equation-rotation-speed: 6s; /* Base rotation animation speed */
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #0ad159;
            padding: 10px;
            position: relative;
            border-bottom: 2px solid #ccc; /* Narrower border */
        }

        .logout-button {
            position: absolute;
            top: 10px;
            left: 10px;
            padding: 5px 10px;
            background-color: #f44336;
            color: white;
            border: 2px solid white;
            cursor: pointer;
            border-radius: 5px;
            font-size: 0.8rem;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
            animation: glow 2s infinite alternate, plocs 1.5s infinite;
        }

        @keyframes glow {
            from {
                box-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
            }
            to {
                box-shadow: 0 0 20px rgba(255, 255, 255, 1);
            }
        }

        @keyframes plocs {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }

        .logout-button:hover {
            background-color: #d32f2f;
        }

        .header-content, .footer-content {
            font-size: var(--equation-font-size);
            text-align: center;
            margin: 10px 0;
        }

        .header-content .char, .footer-content .char {
            display: inline-block;
            transition: transform var(--equation-rotation-speed) ease-in-out;
            animation: rainbow 5s infinite;
        }

        @keyframes rainbow {
            0% { color: red; }
            14% { color: orange; }
            28% { color: yellow; }
            42% { color: green; }
            57% { color: blue; }
            71% { color: indigo; }
            85% { color: violet; }
            100% { color: red; }
        }

        nav {
            background-color: #333;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        nav a {
            color: white;
            padding: 10px;
            text-decoration: none;
            text-align: center;
            flex: 1;
            font-size: 0.9rem; /* Adjusted for mobile */
        }

        nav a:hover {
            background-color: #575757;
        }

        .container {
            padding: 20px;
        }

        section {
            display: none;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            margin-top: 10px;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        footer {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
            border-top: 2px solid #ccc; /* Narrower border */
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            :root {
                --equation-font-size: 1.5rem; /* Smaller font size for mobile */
            }

            .header-content, .footer-content {
                font-size: var(--equation-font-size);
            }

            nav a {
                flex: 1 1 50%; /* Two links per row on mobile */
                font-size: 0.8rem;
            }

            .container {
                padding: 10px;
            }

            section {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <header>
        <button class="logout-button" onclick="window.location.href='logout.php'">Logout</button>
        <div class="header-content" id="header-text"></div>
        <h1 class="text-center">Bangla College Physical Society</h1>
    </header>
    <nav>
        <a href="#upcoming">Upcoming</a>
        <a href="#about-us">About Us</a>
        <a href="#events">Events</a>
        <a href="#history">History</a>
        <a href="#members">Members</a>
        <a href="#committee">Committee</a>
        <a href="#contact">Contact Us</a>
        <a href="#join">Join Us</a>
        <a href="#hall-of-frame">Hall of Frame</a>
        <a href="#developer">Developers</a>
    </nav>
    <div class="container">
        <section id="upcoming">Upcoming Events</section>
        <section id="about-us">
            <h2 style="text-align: center;">Bangla College Physical Society Constitution</h2>
            
            <p style="text-align: center;"><em><strong>Article I: Name</strong></em><br>
            The name of the organization is <strong>Bangla College Physical Society</strong>.</p>

            <p style="text-align: center;"><em><strong>Article II: Purpose</strong></em><br>
            The Physical Society is here to:</p>
            <ul style="text-align: center; list-style-position: inside;">
                <li>Connect modern science with traditional physics education.</li>
                <li>Encourage hands-on learning in physics.</li>
                <li>Promote research in theoretical and applied physics, software reverse engineering, and IoT technology.</li>
            </ul>

            <p style="text-align: center;"><em><strong>Article III: Membership</strong></em></p>
            <p style="text-align: center;"><em><strong>Section 1: Eligibility</strong></em><br>
            Anyone interested in physics—students, faculty, alumni, or professionals in physics, software engineering, or IoT—can join.</p>
            <p style="text-align: center;"><em><strong>Section 2: Dues</strong></em><br>
            Membership fees, if any, will be decided at the start of each academic year.</p>

            <p style="text-align: center;"><em><strong>Article IV: Objectives</strong></em><br>
            The Physical Society aims to:</p>
            <ul style="text-align: center; list-style-position: inside;">
                <li>Bridge the gap between theory and modern physics.</li>
                <li>Offer more practical training in physics.</li>
                <li>Create a supportive environment for physics research.</li>
            </ul>
            <p style="text-align: center;"><em><strong>Section 1: Goals</strong></em><br>
            Advance knowledge in physics, both theory and practice. Combine physics with new technologies like reverse engineering, information processing, and IoT.</p>

            <p style="text-align: center;"><em><strong>Article V: Leadership</strong></em></p>
            <p style="text-align: center;"><em><strong>Section 1: Executive Board</strong></em><br>
            The Executive Board includes:</p>
            <ul style="text-align: center; list-style-position: inside;">
                <li>President</li>
                <li>Vice President</li>
                <li>Secretary</li>
                <li>Treasurer</li>
                <li>General Coordinator</li>
                <li>Executive Moderator</li>
                <li>Advisor</li>
            </ul>
            <p style="text-align: center;"><em><strong>Section 2: Roles</strong></em></p>
            <ul style="text-align: center; list-style-position: inside;">
                <li><strong>President:</strong> Leads the society and represents it.</li>
                <li><strong>Vice President:</strong> Assists the President and manages technical projects.</li>
                <li><strong>Secretary:</strong> Keeps records and handles correspondence.</li>
                <li><strong>Treasurer:</strong> Manages finances and budgets.</li>
                <li><strong>General Coordinator:</strong> Oversees general society activities and supports planning.</li>
                <li><strong>Executive Moderator:</strong> Coordinates executive operations and ensures the smooth functioning of executive decisions and activities.</li>
                <li><strong>Advisor:</strong> Provides guidance and suggestions in meetings and assists in decision-making processes.</li>
            </ul>
            <p style="text-align: center;"><em><strong>Section 3: General Secretary</strong></em><br>
            Principal Abul Kashem will always be the General Secretary. If anyone tries to remove him, the society will be dissolved.</p>
            <p style="text-align: center;"><em><strong>Section 4: Elections</strong></em><br>
            Elections for all positions, except General Secretary, will be held every year by member vote. The term is one academic year, and members can be re-elected.</p>

            <p style="text-align: center;"><em><strong>Article VI: Activities</strong></em></p>
            <p style="text-align: center;"><em><strong>Section 1: Meetings</strong></em><br>
            The society will meet every two weeks to discuss projects, research, and events.</p>
            <p style="text-align: center;"><em><strong>Section 2: Workshops and Seminars</strong></em><br>
            We will organize:</p>
            <ul style="text-align: center; list-style-position: inside;">
                <li>Workshops on theoretical physics and software reverse engineering (C++, Python, MATLAB).</li>
                <li>Practical sessions on IoT and embedded systems (Arduino, Raspberry Pi).</li>
            </ul>

            <p style="text-align: center;"><em><strong>Article VII: Investigation and Peace Committee</strong></em></p>
            <p style="text-align: center;"><em><strong>Section 1: Violations</strong></em><br>
            If a member is involved in violence or misconduct, an investigation will be started.</p>
            <p style="text-align: center;"><em><strong>Section 2: Investigation Committee</strong></em><br>
            The committee will include:</p>
            <ul style="text-align: center; list-style-position: inside;">
                <li>The President</li>
                <li>The Vice President</li>
                <li>Two other members who are not involved in the issue.</li>
            </ul>
            <p style="text-align: center;"><em><strong>Section 3: Committee Duties</strong></em><br>
            The committee will gather facts, interview witnesses, and make a fair decision. They will submit their findings within two weeks.</p>
            <p style="text-align: center;"><em><strong>Section 4: Restoring Peace</strong></em><br>
            The society encourages peaceful resolutions. Anyone found guilty may face suspension, expulsion, or other actions as decided by the committee.</p>

            <p style="text-align: center;"><em><strong>Article VIII: Amendments</strong></em><br>
            Any member can propose changes to the constitution. A two-thirds majority vote is needed to approve changes. However, no changes can be made regarding Principal Abul Kashem’s position as General Secretary.</p>

            <p style="text-align: center;"><em><strong>Article IX: Dissolution</strong></em><br>
            If the society is ever dissolved, any leftover funds will be donated to the Physics Department or a charity supporting science education.</p>

            <p style="text-align: center;"><em><strong>Article X: Alumni Membership</strong></em></p>
            <p style="text-align: center;"><em><strong>Section 1: Eligibility</strong></em><br>
            Alumni, ex-teachers, students, or individuals from any background can apply for alumni membership.</p>
            <p style="text-align: center;"><em><strong>Section 2: Dues</strong></em><br>
            Alumni will pay a membership fee, the amount of which will be decided at the start of each academic year.</p>
            <p style="text-align: center;"><em><strong>Section 3: Conduct</strong></em><br>
            If an alumnus member is found to be at fault, they will be subject to the same disciplinary actions as regular members, including suspension, expulsion, or other actions as determined by the Investigation Committee.<br><br><br><br><br><br></p>
        </section>
        <section id="events">Events</section>
        <section id="history">History</section>
        <section id="members">Members</section>
        <section id="committee">Committee</section>
        <section id="contact">Contact Us</section>
        <section id="join">Join Us</section>
        <section id="hall-of-frame">Hall of Frame</section>
        <section id="developer">Developers</section>
    </div>
    <footer>
        <div class="footer-content" id="footer-text"></div>
        <p>&copy; Developed by Bangla College Physical Society</p>
    </footer>
    <script>
        // Home Page Animations
        const headerText = "F=ma Δx⋅Δp≥ℏ/2 iℏ∂ψ/∂t=Ĥψ";
        const footerText = "E=mc² F=GMm/d² E=hf";
        const headerElement = document.getElementById("header-text");
        const footerElement = document.getElementById("footer-text");

        function createAnimatedText(element, text) {
            element.innerHTML = text.split(" ").map(charGroup => {
                return charGroup.split("").map(char => `<span class="char">${char}</span>`).join("");
            }).join("&nbsp;");
        }

        createAnimatedText(headerElement, headerText);
        createAnimatedText(footerElement, footerText);

        // Random rotation logic
        function randomRotation() {
            const chars = document.querySelectorAll(".char");
            chars.forEach(char => {
                const direction = Math.random() > 0.5 ? 1 : -1; // Randomly choose clockwise or counterclockwise
                const angle = direction * (Math.random() * 360); // Random angle

                // Apply rotation for 3 seconds
                char.style.transition = `transform 3s ease-in-out`;
                char.style.transform = `rotate(${angle}deg)`;
            });

            // Reset rotation to normal after 3 seconds
            setTimeout(() => {
                chars.forEach(char => {
                    char.style.transition = `transform 2s ease-in-out`;
                    char.style.transform = "rotate(0deg)";
                });
            }, 3000); // 3 seconds for rotation

            // Loop the entire animation after 5 seconds (3s rotation + 2s normal)
            setTimeout(randomRotation, 5000); // 5 seconds total for one loop
        }

        // Start the rotation
        randomRotation();

        const links = document.querySelectorAll("nav a");
        links.forEach(link => {
            link.addEventListener("click", function () {
                const sectionId = this.getAttribute("href").substring(1);
                const section = document.getElementById(sectionId);
                const allSections = document.querySelectorAll("section");

                allSections.forEach(sec => {
                    sec.style.display = "none";
                    sec.style.opacity = 0;
                });

                section.style.display = "block";
                setTimeout(() => {
                    section.style.opacity = 1;
                }, 100);
            });
        });

        // Show the first section by default
        document.querySelector("nav a").click();
    </script>
</body>
</html>