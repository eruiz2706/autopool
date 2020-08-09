import AppContent from './components/AppContent';
import Login from './pages/login/LoginPage';
import Register from './pages/register/RegisterPage';
import Dashboard from './pages/dashboard/DashboardPage';
import Investment from './pages/investments/InvestmentPage';
import Deposite from './pages/deposite/DepositePage';
import DepositeHistory from './pages/deposite/DepositeHistoryPage';
import Withdraw from './pages/withdraw/WithdrawPage';
import WithdrawHistory from './pages/withdraw/WithdrawHistoryPage';
import TransactionHistory from './pages/transaction/TransactionHistoryPage';
import Lottery from './pages/lottery/LotteryPage';
import Profile from './pages/profile/ProfilePage';
import Referral from './pages/referral/ReferralPage';
import Tickets from './pages/tickets/TicketsPage';
import TicketsDetalle from './pages/tickets/TicketsDetallePage';

export default [
    {
        path : '/login',
        component: Login,
        name: 'login'
    },
    {
        path : '/register/:id?',
        component: Register,
        name: 'register'
    },
    {
        path : '',
        component: AppContent,
        children: [
            { 
                path: '/', 
                component: Dashboard,
                name:'dashboard'
            },
            { 
                path: '/dashboard', 
                component: Dashboard,
                name:'dashboard'
            },
            { 
                path: '/investments', 
                component: Investment,
                name:'investments'
            },
            { 
                path: '/deposite', 
                component: Deposite,
                name:'deposite'
            },
            { 
                path: '/deposite-history', 
                component: DepositeHistory,
                name:'deposite-history'
            },
            { 
                path: '/withdraw', 
                component: Withdraw,
                name:'withdraw'
            },
            { 
                path: '/withdraw-history', 
                component: WithdrawHistory,
                name:'withdraw-history'
            },
            { 
                path: '/transaction-history', 
                component: TransactionHistory,
                name:'transaction-history'
            },
            { 
                path: '/lottery', 
                component: Lottery,
                name:'lottery'
            },
            { 
                path: '/profile', 
                component: Profile,
                name:'profile'
            },
            { 
                path: '/referral', 
                component: Referral,
                name:'referral'
            },
            { 
                path: '/tickets', 
                component: Tickets,
                name:'tickets'
            },
            { 
                path: '/tickets-details/:id', 
                component: TicketsDetalle,
                name:'tickets-detalle'
            },
        ]
    },
]
