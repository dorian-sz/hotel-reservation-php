import { IoMdCloseCircle } from 'react-icons/io';

export default function ReservationCard({ reservation, deleteReservation }) {
	return (
		<div className='flex border p-2 px-4 rounded-lg w-1/2 sm:w-1/3 md:w-1/6 h-1/6'>
			<div className='flex flex-col h-full justify-between'>
				<div>
					{reservation.rooms.length}{' '}
					{reservation.rooms.length > 1 ? 'Rooms' : 'Room'}
				</div>
				<div>
					<p className='font-semibold'>
						<label className='font-bold text-lg text-red-600'>Total: </label>$
						{reservation.total_cost.toFixed(2)}
					</p>
				</div>
			</div>
			<div className='flex items-center justify-end w-1/3 h-full ml-auto'>
				<button
					className='text-lg sm:text-3xl text-red-600 font-bold hover:scale-125 transition'
					onClick={() => deleteReservation(reservation.id)}>
					<IoMdCloseCircle />
				</button>
			</div>
		</div>
	);
}
