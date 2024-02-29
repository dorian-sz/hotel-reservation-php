import { twMerge } from 'tailwind-merge';

export default function Button({ onClick, isLoading }) {
	return (
		<button
			disabled={isLoading}
			className={twMerge(
				'text-center font-lg text-white font-bold w-full rounded-lg p-2 px-6 bg-red-600 hover:bg-red-800',
				isLoading ? 'bg-red-800' : 'bg-red-600'
			)}
			onClick={() => onClick()}>
			Finalize Reservation
		</button>
	);
}
