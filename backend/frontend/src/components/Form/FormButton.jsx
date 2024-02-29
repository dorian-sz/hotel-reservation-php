import { twMerge } from 'tailwind-merge';

export default function FormButton({ label, isLoading }) {
	return (
		<button
			type='submit'
			className={twMerge(
				'text-center font-lg text-white font-bold w-3/4  rounded-lg p-2 px-6 hover:bg-red-800',
				isLoading ? 'bg-red-800' : 'bg-red-600'
			)}
			disabled={isLoading}>
			{label}
		</button>
	);
}
