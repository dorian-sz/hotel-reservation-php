import { IoMdMenu } from 'react-icons/io';
import { FaUser } from 'react-icons/fa';
import { useState } from 'react';
import { twMerge } from 'tailwind-merge';
import ProfileMenuItem from './ProfileMenuItem';
import Signout from './Signout';

export default function ProfileMenu({ token }) {
	const [isOpen, setIsOpen] = useState(false);

	const authItems = [
		{
			label: 'Log in',
			link: '/login',
		},
		{
			label: 'Register',
			link: '/register',
		},
	];

	const userItems = [
		{
			label: 'My Reservations',
			link: '/reservations',
		},
	];

	const toggleMenu = () => {
		setIsOpen(!isOpen);
	};

	return (
		<div
			onClick={toggleMenu}
			className={twMerge(
				'p-3 relative flex gap-x-4 items-center justify-center border rounded-3xl text-lg hover:shadow-md transition cursor-pointer',
				isOpen ? 'shadow-md' : ''
			)}>
			<IoMdMenu />
			<FaUser />
			{isOpen && (
				<div className='absolute border top-12 right-0 py-2 w-56 bg-white rounded-lg shadow-md'>
					{token && (
						<>
							<ProfileMenuItem items={userItems} />
							<Signout />
						</>
					)}
					{!token && <ProfileMenuItem items={authItems} />}
				</div>
			)}
		</div>
	);
}
