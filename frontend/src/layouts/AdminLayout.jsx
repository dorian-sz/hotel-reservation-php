import { Navigate, Outlet } from 'react-router-dom';
import { useStateContext } from '../context/ContextProvider';

export default function AdminLayout() {
	const { isAdmin } = useStateContext();

	if (!isAdmin) {
		return <Navigate to='/' />;
	}

	return (
		<>
			Adming layout
			<Outlet />
		</>
	);
}
