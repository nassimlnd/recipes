/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./assets/**/*.js", "./templates/**/*.html.twig"],
  theme: {
    extend: {
      textColor: {
        primary: "#101828",
        tertiary: "#475467",
        button: {
          secondary: {
            fg: "#344054"
          }
        }
      },
      borderColor: {
        button: {
          secondary: "#D0D5DD",
        }
      }
    },
  },
  plugins: [],
};
