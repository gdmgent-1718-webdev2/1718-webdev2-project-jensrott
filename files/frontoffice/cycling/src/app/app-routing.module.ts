import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

/* Pages */
import { HomePageComponent } from './home/pages/home-page/home-page.component';
import { AuctionsPageComponent } from './auctions/pages/auctions-page/auctions-page.component';
import { OfferPageComponent } from './offer/pages/offer-page/offer-page.component';
import { ContactPageComponent } from './contact/pages/contact-page/contact-page.component';
import { NotFoundPageComponent } from './core/pages/not-found-page/not-found-page.component';
import { AuctionsDetailComponent } from './auctions/pages/auctions-detail/auctions-detail.component';

/* Profile */
import { NoAccountPageComponent } from './profile/pages/noaccount-page/noaccount-page.component';
import { RegisterPageComponent } from './profile/pages/register-page/register-page.component';
import { ProfilePageComponent } from './profile/pages/profile-page/profile-page.component';
import { EditProfilePageComponent } from './profile/pages/edit-profile-page/edit-profile-page.component';
import { OwnAuctionsPageComponent } from './profile/pages/own-auctions-page/own-auctions-page.component';
import { ProfileDeleteModalComponent } from './profile/components/profile-delete-modal/profile-delete-modal.component';

const routes: Routes = [
 {path: '', redirectTo: '/home', pathMatch: 'full'},
 {path: 'home', component: HomePageComponent},
 {path: 'products', component: AuctionsPageComponent}, // Can normally only be accessed when logged in
 {path: 'offer', component: OfferPageComponent},
 {path: 'contact', component: ContactPageComponent},
 {path: 'detail', component: AuctionsDetailComponent}, // Temporary
 {path: '404', component: NotFoundPageComponent},

 /* Profile */
 {path: 'create', component: NoAccountPageComponent},
 {path: 'register', component: RegisterPageComponent},
 {path: 'profile', component: ProfilePageComponent},
 {path: 'edit-profile', component: EditProfilePageComponent},
 {path: 'own-auctions', component: OwnAuctionsPageComponent},
 {path: '**', redirectTo: '/404'},

 {path: 'modal', component: ProfileDeleteModalComponent }, // Test for now so I can see it
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
