import { Navigate, Outlet } from 'react-router-dom';
import { useStateContext } from '../context/ContextProvider';
import Navbar from '../components/Navbar/Navbar';

export default function DefaultLayout() {
	const { user, token } = useStateContext();
	if (!token) {
		return <Navigate to='/login' />;
	}

	return (
		<div className='h-full'>
			<Navbar
				user={user}
				token={token}
			/>
			<div className='h-full pt-20'>
				<Outlet />
			</div>
		</div>
	);
}
