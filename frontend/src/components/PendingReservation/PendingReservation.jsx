import { useEffect, useState } from 'react';
import Button from './Button';
import PendingReservationCard from './PendingReservationCard';
import axiosClient from '../../axios-client';
import { useStateContext } from '../../context/ContextProvider';

export default function PendingReservation({
	reservations,
	removeReservation,
	setReservations,
}) {
	const { user } = useStateContext();

	const [total, setTotal] = useState(null);
	const [isLoading, setIsLoading] = useState(false);

	useEffect(() => {
		getTotal();
	}, [reservations]);

	const getTotal = () => {
		if (reservations.length > 0) {
			const sum = reservations.reduce((accumulator, currentValue) => {
				return parseFloat(accumulator) + parseFloat(currentValue.cost);
			}, 0);
			setTotal(sum.toFixed(2));
		}
	};

	const postReservation = () => {
		const payload = {
			user_id: user.id,
			room_ids: reservations.map((room) => room.id),
		};

		setIsLoading(true);
		axiosClient
			.post('/reservations', payload)
			.then(() => {
				setIsLoading(false);
				setReservations([]);
				localStorage.removeItem('reservation');
			})
			.catch(() => {
				setIsLoading(false);
			});
	};

	return (
		<div className='flex flex-col gap-y-6 w-full p-4 py-6 border-b'>
			<div>
				<p className='font-extrabold w-full text-xl sm:text-2xl text-red-600'>
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
			<div className='flex justify-between w-full md:w-1/2'>
				<div className='flex w-1/4'>
					<p className='text-xl font-bold text-red-600'>
						Total:{' '}
						{total && <label className='font-bold text-black'>${total}</label>}
					</p>
				</div>
				<div className='w-3/5'>
					<Button
						onClick={postReservation}
						isLoading={isLoading}
					/>
				</div>
			</div>
		</div>
	);
}
