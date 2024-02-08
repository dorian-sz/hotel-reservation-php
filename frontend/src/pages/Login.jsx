import { useRef, useState } from 'react';
import Form from '../components/Form/Form';
import axiosClient from '../axios-client';
import { useStateContext } from '../context/ContextProvider';

export default function Login() {
	const emailRef = useRef();
	const passwordRef = useRef();

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
			label: 'Password',
			id: 'password',
			type: 'password',
			ref: passwordRef,
		},
	];

	const onSubmit = (e) => {
		e.preventDefault();
		setIsLoading(true);
		const payload = {
			email: emailRef.current.value,
			password: passwordRef.current.value,
		};
		console.log(payload);
		axiosClient
			.post('/login', payload)
			.then(({ data }) => {
				console.log(data);
				setUser(data.user);
				setIsAdmin(data.isAdmin);
				setToken(data.token);
				setIsLoading(false);
			})
			.catch((err) => {
				console.log(err);
				const response = err.response;
				if (response && response.status === 422) {
					console.log(response.data.errors);
				}
				setIsLoading(false);
			});
	};

	return (
		<div className='flex w-full justify-center mt-20 '>
			<Form
				title={'Login into your account'}
				fields={fields}
				buttonLabel={'Log in'}
				onSubmit={onSubmit}
				isLoading={isLoading}
			/>
		</div>
	);
}
