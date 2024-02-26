import { Navigate, Outlet } from 'react-router-dom';
import { useStateContext } from '../context/ContextProvider';
import Navbar from '../components/Navbar/Navbar';

export default function GuestLayout() {
	const { token } = useStateContext();

	if (token) {
		return <Navigate to='/' />;
	}

	return (
		<div className='h-full'>
			<Navbar />
			<div className='h-full pt-20'>
				<Outlet />
			</div>
		</div>
	);
}
