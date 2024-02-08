import { Navigate, Outlet } from 'react-router-dom';
import { useStateContext } from '../context/ContextProvider';
import Navbar from '../components/Navbar/Navbar';

export default function DefaultLayout() {
	const { user, token } = useStateContext();

	if (!token) {
		return <Navigate to='/logged-out' />;
	}

	return (
		<>
			<Navbar
				user={user}
				token={token}
			/>
			Default layout
			<Outlet />
		</>
	);
}
