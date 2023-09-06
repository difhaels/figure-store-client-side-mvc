/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./index.php",

            "../app/views/templates/header.php",
            "../app/views/templates/footer.php",
            
            "../app/views/home/index.php",

            "../app/views/setting/index.php",
            "../app/views/setting/admin.php",
            "../app/views/setting/item.php",
            "../app/views/setting/item/addPage.php",
            "../app/views/setting/item/update.php",
            "../app/views/setting/update.php",
            "../app/views/setting/member.php",
            "../app/views/setting/transaction.php",

            "../app/views/detail/index.php",

            "../app/views/logister/user.php",
            "../app/views/logister/login.php",
            "../app/views/logister/register.php",
            
            "../app/views/transaction/index.php",
            "../app/views/transaction/info.php"
          ],
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

