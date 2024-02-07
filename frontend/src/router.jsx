import { Navigate, createBrowserRouter } from 'react-router-dom';
import Login from './pages/Login';
import Signup from './pages/Signup';
import NotFound from './pages/NotFound';
import DefaultLayout from './layouts/DefaultLayout';
import GuestLayout from './layouts/GuestLayout';
import Home from './pages/Home';
import AdminLayout from './layouts/AdminLayout';
import Dashboard from './pages/Dashboard';

const router = createBrowserRouter([
	{
		path: '/',
		element: <DefaultLayout />,
		children: [
			{
				path: '/',
				element: <Navigate to='/logged-in' />,
			},
			{
				path: '/logged-in',
				element: <Home />,
			},
		],
	},
	{
		path: '/',
		element: <GuestLayout />,
		children: [
			{
				path: '/',
				element: <Navigate to='/logged-out' />,
			},
			{
				path: '/logged-out',
				element: <Home />,
			},
			{
				path: '/login',
				element: <Login />,
			},
			{
				path: '/register',
				element: <Signup />,
			},
		],
	},
	{
		path: '/dashboard',
		element: <AdminLayout />,
		children: [
			{
				path: '/dashboard',
				element: <Dashboard />,
			},
		],
	},
	{
		path: '*',
		element: <NotFound />,
	},
]);

export default router;
