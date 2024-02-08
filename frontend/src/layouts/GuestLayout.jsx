import { Navigate, Outlet } from 'react-router-dom';
import { useStateContext } from '../context/ContextProvider';
import Navbar from '../components/Navbar/Navbar';

export default function GuestLayout() {
	const { token } = useStateContext();

	if (token) {
		return <Navigate to='/logged-in' />;
	}

	return (
		<div>
			<Navbar />
			<Outlet />
		</div>
	);
}
