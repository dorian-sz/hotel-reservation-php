/** @type {import('tailwindcss').Config} */
export default {
	content: ['./index.html', './src/**/*.{js,ts,jsx,tsx}'],
	theme: {
		minWidth: {
			'1/5': '20%',
			'1/4': '25%',
			'2/5': '40%',
		},
		minHeight: {
			'1/5': '20%',
			'1/4': '25%',
			'2/5': '40%',
		},
		extend: {},
	},
	plugins: [],
};
