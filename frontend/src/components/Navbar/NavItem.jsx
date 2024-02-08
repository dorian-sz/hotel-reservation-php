import { Link } from 'react-router-dom';
import { twMerge } from 'tailwind-merge';

export default function NavItem({ label, url, active }) {
	return (
		<Link
			className={twMerge(
				'flex justify-center items-center p-2 px-5',
				active ? 'font-semibold' : 'hover: rounded-3xl hover:bg-stone-100'
			)}
			to={url}>
			{label}
		</Link>
	);
}
