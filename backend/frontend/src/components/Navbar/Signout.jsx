import axiosClient from '../../axios-client';
import { useStateContext } from '../../context/ContextProvider';

export default function Signout() {
	const { setIsAdmin, setToken, setUser } = useStateContext();

	const onLogout = () => {
		axiosClient.post('/logout').then(() => {
			setUser({});
			setIsAdmin(false);
			setToken(null);
			localStorage.clear();
		});
	};

	return (
		<div className='w-full flex flex-col text-base border-t'>
			<div
				onClick={onLogout}
				className='w-full p-2 hover:bg-stone-100'>
				Sign out
			</div>
		</div>
	);
}
