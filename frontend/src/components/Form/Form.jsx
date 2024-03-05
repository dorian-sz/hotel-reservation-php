import { Link } from 'react-router-dom';
import FormButton from './FormButton';
import FormInput from './FormInput';

export default function Form({
	title,
	fields,
	buttonLabel,
	onSubmit,
	isLoading,
	error,
	label,
	linkTo,
}) {
	return (
		<form
			className='flex flex-col justify-center items-center gap-y-4 w-full mx-1 md:w-3/4 lg:w-1/3 h-1/2 p-4 border rounded-lg'
			onSubmit={onSubmit}>
			<p className='text-xl font-extrabold text-red-700'>{title}</p>
			{fields.map((field) => (
				<FormInput
					key={field.id}
					{...field}
				/>
			))}
			{error && <p className='text-xl font-extrabold text-red-500'>{error}</p>}
			<FormButton
				label={buttonLabel}
				isLoading={isLoading}
			/>
			{label && (
				<div className='flex w-3/4 flex-start'>
					<Link
						className='font-bold text-red-500 underline hover:no-underline hover:text-red-700'
						to={linkTo}>
						{label}
					</Link>
				</div>
			)}
		</form>
	);
}
