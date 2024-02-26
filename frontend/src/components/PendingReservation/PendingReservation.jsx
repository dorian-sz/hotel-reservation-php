import { useEffect, useState } from 'react';
import Button from './Button';
import PendingReservationCard from './PendingReservationCard';
import axiosClient from '../../axios-client';

export default function PendingReservation({
	reservations,
	removeReservation,
}) {
	const [total, setTotal] = useState(null);
	const [roomIds, setRoomIds] = useState({});

	useEffect(() => {
		console.log('here');
		setRoomIds({
			ids: reservations.map((room) => room.id),
		});
	}, [reservations]);

	useEffect(() => {
		getTotal();
	}, [roomIds]);

	const getTotal = () => {
		axiosClient
			.post('/reservations/total-cost', roomIds)
			.then(({ data }) => {
				setTotal(data);
			})
			.catch(() => {});
	};

	return (
		<div className='flex flex-col gap-y-6 w-full p-4 py-6 border-b'>
			<div>
				<p className='font-extrabold text-2xl text-red-600'>
					Your planned reservations
				</p>
			</div>
			<div className='flex w-full gap-x-4 flex-wrap gap-y-2'>
				{reservations.length > 0 &&
					reservations.map((reservation) => (
						<PendingReservationCard
							key={reservation.id}
							reservation={reservation}
							removeReservation={removeReservation}
						/>
					))}
			</div>
			<div className='flex justify-between w-1/2'>
				<div className='flex w-1/4'>
					<p className='text-xl font-bold text-red-600'>
						Total:{' '}
						{total && <label className='font-bold text-black'>${total}</label>}
					</p>
				</div>
				<div className='w-3/5'>
					<Button />
				</div>
			</div>
		</div>
	);
}
