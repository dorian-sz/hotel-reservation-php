import { useRef, useState } from 'react';
import Form from '../components/Form/Form';
import axiosClient from '../axios-client';
import { useStateContext } from '../context/ContextProvider';

export default function Signup() {
	const fNameRef = useRef();
	const lNameRef = useRef();
	const emailRef = useRef();
	const passwordRef = useRef();
	const passwordConfirmationRef = useRef();

	const [isLoading, setIsLoading] = useState(false);

	const { setUser, setToken, setIsAdmin } = useStateContext();

	const fields = [
		{
			label: 'Email address',
			id: 'email',
			type: 'email',
			ref: emailRef,
		},
		{
			label: 'First name',
			id: 'fName',
			type: 'text',
			ref: fNameRef,
		},
		{
			label: 'Last name',
			id: 'lName',
			type: 'text',
			ref: lNameRef,
		},
		{
			label: 'Password',
			id: 'password',
			type: 'password',
			ref: passwordRef,
		},
		{
			label: 'Confirm password',
			id: 'confirmPassword',
			type: 'password',
			ref: passwordConfirmationRef,
		},
	];

	const onSubmit = (e) => {
		e.preventDefault();
		setIsLoading(true);
		const payload = {
			email: emailRef.current.value,
			first_name: fNameRef.current.value,
			last_name: lNameRef.current.value,
			password: passwordRef.current.value,
			password_confirmation: passwordConfirmationRef.current.value,
		};
		axiosClient
			.post('/signup', payload)
			.then(({ data }) => {
				setUser(data.user);
				setIsAdmin(data.isAdmin);
				setToken(data.token);
			})
			.catch((err) => {
				const response = err.response;
				if (response && response.status === 422) {
					console.log(response.data.errors);
				}
			});
		setIsLoading(false);
	};

	return (
		<div className='flex w-full justify-center mt-20 '>
			<Form
				title={'Create a new account'}
				fields={fields}
				buttonLabel={'Register'}
				onSubmit={onSubmit}
				isLoading={isLoading}
			/>
		</div>
	);
}
