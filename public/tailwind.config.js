/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./index.php",
            "../app/views/templates/header.php",

            "../app/views/home/index.php",

            "../app/views/detail/index.php",

            "../app/views/logister/user.php",
            "../app/views/logister/login.php",
            "../app/views/logister/register.php",
            
            "../app/views/transaction/index.php",

            "../app/views/templates/footer.php"],
  theme: {
    extend: {
      colors: {
        bg1 : '#4FC0D0',
        bg2 : '#1B6B93',
        button1 : "#164B60",
        button2 : "#F5AF19",
        buttonHover1 : "#A2FF86",
      }
    },
  },
  plugins: [],
}

