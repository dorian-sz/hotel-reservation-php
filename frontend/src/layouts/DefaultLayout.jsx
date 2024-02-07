import { Navigate, Outlet } from 'react-router-dom';
import { useStateContext } from '../context/ContextProvider';

export default function DefaultLayout() {
	const { user, token } = useStateContext();

	if (!token) {
		return <Navigate to='/logged-out' />;
	}

	return (
		<>
			Default layout
			<Outlet />
		</>
	);
}
