import { IoMdClose } from 'react-icons/io';

export default function PendingReservationCard({
	reservation,
	removeReservation,
}) {
	return (
		<div className='flex border p-2 px-4 rounded-lg w-full sm:w-1/3 md:w-1/6'>
			<div className='flex flex-col gap-y-2'>
				<div>{reservation.size.size_name} Room</div>
				<div>
					<p className='font-semibold'>${reservation.cost}</p>
				</div>
			</div>
			<div className='flex items-center justify-end w-1/3 h-full ml-auto'>
				<button
					className='text-3xl text-red-600 font-bold hover:scale-125 transition'
					onClick={() => removeReservation(reservation)}>
					<IoMdClose />
				</button>
			</div>
		</div>
	);
}
