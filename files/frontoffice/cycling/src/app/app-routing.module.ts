import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

/* Pages */
import { HomePageComponent } from './home/pages/home-page/home-page.component';
import { AuctionsPageComponent } from './auctions/pages/auctions-page/auctions-page.component';
import { OfferPageComponent } from './offer/pages/offer-page/offer-page.component';
import { ContactPageComponent } from './contact/pages/contact-page/contact-page.component';
import { NotFoundPageComponent } from './core/pages/not-found-page/not-found-page.component';
import { AuctionsDetailComponent } from './auctions/pages/auctions-detail/auctions-detail.component';
import { AuctionOverviewComponent } from './auctions/components/auction-overview/auction-overview.component';

/* Profile */
import { NoAccountPageComponent } from './profile/pages/noaccount-page/noaccount-page.component';
import { RegisterPageComponent } from './profile/pages/register-page/register-page.component';
import { ProfilePageComponent } from './profile/pages/profile-page/profile-page.component';
import { EditProfilePageComponent } from './profile/pages/edit-profile-page/edit-profile-page.component';
import { OwnAuctionsPageComponent } from './profile/pages/own-auctions-page/own-auctions-page.component';

/* Route Securization */
import { AuthGuard } from './core/guards/auth.guard';

const routes: Routes = [
 {path: '', redirectTo: '/home', pathMatch: 'full'},
 {path: 'home', component: HomePageComponent},
 {path: 'auctions', component: AuctionsPageComponent, canActivate: [AuthGuard]}, // Only accessible when logged in
 {path: 'offer', component: OfferPageComponent, canActivate: [AuthGuard]},
 {path: 'contact', component: ContactPageComponent}, // Can be accessed even when not logged in
 {path: 'detail', component: AuctionsDetailComponent, canActivate: [AuthGuard] }, // Temporary
 {path: 'auction-overview', component: AuctionOverviewComponent, canActivate: [AuthGuard] }, // Temporary
 {path: '404', component: NotFoundPageComponent},

 /* Profile */
 {path: 'create', component: NoAccountPageComponent},
 {path: 'register', component: RegisterPageComponent},
 {path: 'profile', component: ProfilePageComponent, canActivate: [AuthGuard]},
 {path: 'edit-profile', component: EditProfilePageComponent, canActivate: [AuthGuard]},
 {path: 'own-auctions', component: OwnAuctionsPageComponent, canActivate: [AuthGuard]},
 {path: '**', redirectTo: '/404'},
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes),
  ],
  declarations: [],
  exports: [
    RouterModule,
  ],
})
export class AppRoutingModule { }
