import loading from '/images/Loading.gif';

export default function Loading() {
	return (
		<div className='flex justify-center items-center w-1/3 m-auto'>
			<img
				className='w-40'
				src={loading}
			/>
		</div>
	);
}
