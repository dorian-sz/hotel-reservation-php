import { useEffect, useState } from 'react';
import axiosClient from '../axios-client';
import { useStateContext } from '../context/ContextProvider';
import ReservationCard from '../components/Reservation/ReservationCard';
import Loading from '../components/Loading/Loading';

export default function Reservations() {
	const { user } = useStateContext();
	const [loading, setLoading] = useState(true);
	const [reservations, setReservations] = useState([]);

	useEffect(() => {
		getReservations();
	}, []);

	const getReservations = () => {
		axiosClient
			.get(`/user-reservations/${user.id}`)
			.then(({ data }) => {
				setReservations(data.data);
				setLoading(false);
			})
			.catch((err) => {
				console.log(err);
				setLoading(false);
			});
	};

	const deleteReservation = (id) => {
		axiosClient.delete(`/reservations/${id}`).then(({ data }) => {
			let filtered = reservations.filter((reservation) => reservation.id != id);
			setReservations(filtered);
		});
	};

	return (
		<div className='flex flex-col md:gap-x-1 w-full xl:w-3/4 h-full mx-auto p-4'>
			<div className='flex  md:gap-x-1 w-full h-full flex-wrap'>
				{loading && <Loading />}
				{!loading &&
					reservations.map((reservation) => (
						<ReservationCard
							key={reservation.id}
							reservation={reservation}
							deleteReservation={deleteReservation}
						/>
					))}
			</div>
		</div>
	);
}
