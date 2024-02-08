/* eslint-disable react/display-name */
import { forwardRef } from 'react';

const FormInput = forwardRef(({ label, id, type }, ref) => {
	return (
		<div className='flex flex-col w-3/4'>
			<label htmlFor={id}>{label}</label>
			<input
				id={id}
				name={id}
				className='border rounded-lg p-1'
				type={type}
				ref={ref}
				required
			/>
		</div>
	);
});

export default FormInput;
