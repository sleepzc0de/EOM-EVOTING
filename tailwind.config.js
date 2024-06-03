import withMT from "@material-tailwind/html/utils/withMT";
/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [],
};
// module.exports = {
//     // ...
//     plugins: [
//         // ...
//         require("@tailwindcss/forms"),
//     ],
// };
