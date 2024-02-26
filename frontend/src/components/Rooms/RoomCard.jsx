import Button from './Button';
import placeholder from '/images/No-Image-Placeholder.svg.png';

export default function RoomCard({ room, addReservation }) {
	return (
		<div className='flex flex-col gap-y-2 w-full sm:w-5/12 md:w-1/3 lg:w-1/5 h-1/2 sm:min-h-2/5 '>
			<div className='rounded-lg'>
				<img
					className='object-fill'
					src={placeholder}
				/>
			</div>
			<div className='flex flex-col'>
				<p className='font-bold'>{room.size.size_name} room</p>
				<div className='flex gap-x-1'>
					<p className='font-semibold'>${room.cost}</p>
					<p>night</p>
				</div>
			</div>
			<Button
				addReservation={addReservation}
				room={room}
			/>
		</div>
	);
}
