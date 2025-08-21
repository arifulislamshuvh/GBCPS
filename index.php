<?php
session_start();

// Default credentials
$defaultUsername = 'user';
$defaultPassword = 'password';

// Redirect if already logged in
if (isset($_SESSION['loggedin'])) {
    header('Location: home.php');
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if credentials match
    if ($username === $defaultUsername && $password === $defaultPassword) {
        $_SESSION['loggedin'] = true;
        header('Location: home.php');
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bangla College Physical Society</title>
    <meta name="description" content="Login to access exclusive content and features of the Bangla College Physical Society.">
    <meta name="keywords" content="Bangla College, Physical Society, Login, Physics, Events">
    <meta name="author" content="Bangla College Physical Society">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Consistent Color Scheme */
        :root {
            --primary-color: #0ad159;
            --secondary-color: #4CAF50;
            --accent-color: #f44336;
            --background-gradient: linear-gradient(90deg, #ff0000, #ff9900, #ffff00, #00ff00, #0000ff, #4b0082, #8b00ff);
            --text-color: #333;
            --light-text: #fff;
        }

        /* Body styling with animated gradient background */
        body {
            background: var(--background-gradient);
            background-size: 600% 600%;
            animation: spectrum 15s ease infinite;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            margin: 0;
            font-family: Arial, sans-serif;
            color: var(--text-color);
        }

        /* Keyframes for the gradient animation */
        @keyframes spectrum {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Login container styling */
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            position: relative;
            z-index: 2;
        }

        /* Rotating text styling */
        .rotating-text {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--text-color);
            text-align: center;
            margin-bottom: 20px;
        }

        /* Bangla letter styling */
        .bangla-letter {
            position: absolute;
            font-size: 24px;
            font-weight: bold;
            color: #FFD700; /* Golden color for glow */
            text-shadow: 0 0 10px #FFD700, 0 0 20px #FFD700, 0 0 30px #FFD700; /* Glow effect */
            pointer-events: none; /* Ensure letters don't interfere with clicks */
            animation: flutter 5s linear infinite; /* Fluttering animation */
        }

        /* Fluttering animation for letters */
        @keyframes flutter {
            0%, 100% {
                transform: translateX(0) rotate(0deg);
            }
            25% {
                transform: translateX(-5px) rotate(-10deg);
            }
            50% {
                transform: translateX(5px) rotate(10deg);
            }
            75% {
                transform: translateX(-5px) rotate(-10deg);
            }
        }

        /* Call-to-Action (CTA) Button styling */
        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
        }

        /* Accessibility features */
        a, button {
            outline: none;
        }

        a:focus, button:focus {
            outline: 2px solid var(--accent-color);
        }

        /* Responsive design for smaller screens */
        @media (max-width: 768px) {
            .login-container {
                padding: 20px;
            }

            .rotating-text {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Container for falling Bangla letters -->
    <div class="letter-container" id="letterContainer"></div>

    <!-- Login form container -->
    <div class="login-container">
        <div class="rotating-text">Bangla College Physical Society Login Form</div>
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">User ID:</label>
                <input type="text" class="form-control" id="username" name="username" required aria-label="Enter your username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required aria-label="Enter your password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <?php if (isset($error)) echo "<p class='text-danger mt-3'>$error</p>"; ?>
        </form>
    </div>

    <script>
        // Bangla Letter Animation Logic
        const letterContainer = document.getElementById("letterContainer");
        const letters = [];

        // List of Bangla Unicode characters
        const banglaLetters = [
            "অ", "আ", "ই", "ঈ", "উ", "ঊ", "ঋ", "ঌ", "এ", "ঐ", "ও", "ঔ", // Vowels
            "া", "ি", "ী", "ু", "ূ", "ৃ", "ৄ", "ে", "ৈ", "ো", "ৌ", // Dependent Vowel Signs
            "ক", "খ", "গ", "ঘ", "ঙ", "চ", "ছ", "জ", "ঝ", "ঞ", "ট", "ঠ", "ড", "ঢ", "ণ", "ত", "থ", "দ", "ধ", "ন", "প", "ফ", "ব", "ভ", "ম", "য", "র", "ল", "শ", "ষ", "স", "হ", "ড়", "ঢ়", "য়", // Consonants
            "০", "১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", // Numerals
            "।", "॥", "ঽ", "৳", // Symbols and Punctuation
            "ৠ", "ৡ", "ৢ", "ৣ", "৤", "৥", "৲", "৴", "৵", "৶", "৷", "৸", "৹", "৺" // Rare and Historic Characters
        ];

        // Variables for controlling falling rate and speed
        let fallingRate = 50; // Number of letters to fall (can be changed dynamically)
        let fallingSpeed = 2; // Base speed of falling (can be changed dynamically)

        // Function to create a new falling letter
        function createLetter() {
            const letter = document.createElement("div");
            letter.className = "bangla-letter";
            letter.textContent = banglaLetters[Math.floor(Math.random() * banglaLetters.length)]; // Random Bangla letter
            letter.style.left = `${Math.random() * window.innerWidth}px`; // Random horizontal position
            letter.style.top = `${-50}px`; // Start above the screen
            letterContainer.appendChild(letter);

            // Random initial velocity and drift
            const velocity = {
                y: (Math.random() * fallingSpeed) + 1, // Random vertical falling speed
                x: (Math.random() - 0.5) * 2, // Random horizontal drift (both left and right)
            };
            letters.push({ element: letter, velocity });
        }

        // Function to update letter positions
        function updateLetters() {
            letters.forEach((letter, index) => {
                const rect = letter.element.getBoundingClientRect();

                // Update letter position
                letter.element.style.left = `${rect.left + letter.velocity.x}px`;
                letter.element.style.top = `${rect.top + letter.velocity.y}px`;

                // Remove letter if it goes below the screen
                if (rect.top > window.innerHeight) {
                    letter.element.remove(); // Remove the letter from the DOM
                    letters.splice(index, 1); // Remove the letter from the array
                }
            });

            // Create new letters to maintain the falling rate
            while (letters.length < fallingRate) {
                createLetter();
            }

            requestAnimationFrame(updateLetters);
        }

        // Start the animation
        updateLetters();

        // Handle window resize
        window.addEventListener("resize", () => {
            letters.forEach((letter) => {
                const rect = letter.element.getBoundingClientRect();
                if (rect.left < 0) letter.element.style.left = `${0}px`;
                if (rect.left > window.innerWidth) letter.element.style.left = `${window.innerWidth - 30}px`;
            });
        });

        // Example: Change falling rate and speed dynamically
        setTimeout(() => {
            fallingRate = 30; // Reduce the number of falling letters
            fallingSpeed = 1; // Slow down the falling speed
        }, 10000); // Change after 10 seconds
    </script>
</body>
</html>