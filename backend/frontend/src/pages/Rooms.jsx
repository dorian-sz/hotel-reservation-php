import { useEffect, useState } from 'react';
import RoomCard from '../components/Rooms/RoomCard';
import axiosClient from '../axios-client';
import Loading from '../components/Loading/Loading';
import PendingReservation from '../components/PendingReservation/PendingReservation';

export default function Rooms() {
	const [rooms, setRooms] = useState([]);
	const [loading, setLoading] = useState(true);
	const [reservations, setReservations] = useState(
		JSON.parse(localStorage.getItem('reservation')) || []
	);

	useEffect(() => {
		getRooms();
	}, []);

	useEffect(() => {
		filterReserved();
	}, [reservations]);

	const addToLocalstorageReservation = (room) => {
		let reservation = JSON.parse(localStorage.getItem('reservation')) || [];
		reservation.push(room);
		localStorage.setItem('reservation', JSON.stringify(reservation));
	};

	const removeFromLocalstorageReservation = (room) => {
		let reservation = JSON.parse(localStorage.getItem('reservation')) || [];
		if (reservation.length > 0) {
			let filtered = reservation.filter((r) => r.id != room.id);
			localStorage.setItem('reservation', JSON.stringify(filtered));
		}
	};

	const addReservation = (room) => {
		setReservations([...reservations, room]);
		addToLocalstorageReservation(room);
	};

	const removeReservation = (room) => {
		removeFromLocalstorageReservation(room);
		let filtered = reservations.filter((r) => r !== room);
		setReservations(filtered);
		setRooms([...rooms, room]);
	};

	const filterReserved = () => {
		let filtered = filter(rooms, reservations);
		setRooms(filtered);
	};

	const filter = (mainArr, includesArr) => {
		if (includesArr.length > 0) {
			let filtered = mainArr.filter(
				(r) => !includesArr.find((res) => r.id === res.id)
			);
			return filtered;
		}
		return mainArr;
	};

	const getRooms = () => {
		setLoading(true);
		axiosClient
			.get('/room-details/available')
			.then(({ data }) => {
				setLoading(false);
				let filtered = filter(data.data, reservations);
				setRooms(filtered);
			})
			.catch(() => {
				setLoading(false);
			});
	};

	return (
		<div className='flex flex-col md:gap-x-1 gap-y-14 w-full xl:w-3/4 h-full mx-auto p-4'>
			{
				//prettier-ignore
				(!loading && (rooms.length === 0 && reservations.length === 0)) && (
					<div className='h-full flex justify-center items-center'>
						<p className='text-3xl font-extrabold text-red-600'>
							Currently there are no available rooms.
						</p>
					</div>
				)
			}
			{reservations.length > 0 && (
				<PendingReservation
					reservations={reservations}
					setReservations={setReservations}
					removeReservation={removeReservation}
					setLoading={setLoading}
				/>
			)}
			<div className='flex justify-center sm:justify-evenly md:gap-x-1 gap-y-14 w-full h-full flex-wrap'>
				{loading && <Loading />}
				{!loading &&
					rooms.map((room) => (
						<RoomCard
							key={room.id}
							room={room}
							addReservation={addReservation}
						/>
					))}
			</div>
		</div>
	);
}
