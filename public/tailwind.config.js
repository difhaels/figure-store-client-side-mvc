/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./index.php",
            "../app/views/templates/header.php"],
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

