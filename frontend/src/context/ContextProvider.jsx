import { createContext, useContext, useState } from 'react';

const StateContext = createContext({
	currentUser: null,
	token: null,
	isAdmin: null,
	setUser: () => {},
	setToken: () => {},
	setIsAdmin: () => {},
});

export const ContextProvider = ({ children }) => {
	const [user, _setUser] = useState(JSON.parse(localStorage.getItem('USER')));
	const [isAdmin, setIsAdmin] = useState(false);
	const [token, _setToken] = useState(localStorage.getItem('ACCESS_TOKEN'));

	const setToken = (token) => {
		_setToken(token);
		if (token) {
			localStorage.setItem('ACCESS_TOKEN', token);
		} else {
			localStorage.removeItem('ACCESS_TOKEN');
		}
	};

	const setUser = (user) => {
		_setUser(user);
		if (user) {
			localStorage.setItem('USER', JSON.stringify(user));
		} else {
			localStorage.removeItem('USER');
		}
	};

	return (
		<StateContext.Provider
			value={{ user, token, isAdmin, setIsAdmin, setUser, setToken }}>
			{children}
		</StateContext.Provider>
	);
};

export const useStateContext = () => useContext(StateContext);
