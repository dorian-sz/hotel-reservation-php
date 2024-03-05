import { useLocation } from 'react-router-dom';
import NavItem from './NavItem';
import ProfileMenu from './ProfileMenu';

export default function Navbar({ user, token }) {
	const location = useLocation();

	const navItems = [
		{
			label: 'Rooms',
			url: '/',
			active: location.pathname.includes('room'),
		},
	];

	return (
		<nav className='flex w-full p-4 justify-center fixed border-b bg-white'>
			<div className='flex w-3/4 justify-between items-center'>
				<div className='w-full cursor-pointer'>
					<p className='font-extrabold text-xl md:text-2xl text-red-500'>H/R</p>
				</div>
				<div className='flex w-full items-center justify-center gap-x-5 md:text-lg'>
					{navItems.map((item) => (
						<NavItem
							key={item.label}
							{...item}
						/>
					))}
				</div>
				<div className='w-full flex flex-row-reverse'>
					<ProfileMenu
						token={token}
						user={user}
					/>
				</div>
			</div>
		</nav>
	);
}
