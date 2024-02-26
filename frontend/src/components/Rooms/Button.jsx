import { twMerge } from 'tailwind-merge';

export default function Button({ room, addReservation }) {
	return (
		<button
			className={twMerge(
				'text-center font-lg text-white font-bold w-full rounded-lg p-2 px-6 bg-red-600 hover:bg-red-800'
			)}
			onClick={() => addReservation(room)}>
			Reserve
		</button>
	);
}
