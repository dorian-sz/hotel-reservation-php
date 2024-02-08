import { Link } from 'react-router-dom';

export default function ProfileMenuItem({ items }) {
	return (
		<div className='w-full flex flex-col text-base'>
			{items.map((item) => (
				<Link
					className='w-full p-2 hover:bg-stone-100'
					key={item.label}
					to={item.link}>
					{item.label}
				</Link>
			))}
		</div>
	);
}
