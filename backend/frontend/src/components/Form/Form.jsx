import FormButton from './FormButton';
import FormInput from './FormInput';

export default function Form({
	title,
	fields,
	buttonLabel,
	onSubmit,
	isLoading,
	error,
}) {
	return (
		<form
			className='flex flex-col items-center gap-y-4 w-full mx-1 md:w-3/4 lg:w-1/3 h-auto p-4 border rounded-lg'
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
		</form>
	);
}
