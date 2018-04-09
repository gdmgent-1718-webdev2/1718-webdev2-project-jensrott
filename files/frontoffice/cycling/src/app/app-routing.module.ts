import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

/* Pages */
import { HomePageComponent } from './home/pages/home-page/home-page.component';
import { ProductsPageComponent } from './products/pages/products-page/products-page.component';
import { OfferPageComponent } from './offer/pages/offer-page/offer-page.component';
import { ContactPageComponent } from './contact/pages/contact-page/contact-page.component';
import { ProfilePageComponent } from './profile/pages/profile-page/profile-page.component';
import { NotFoundPageComponent } from './core/pages/not-found-page/not-found-page.component';

const routes: Routes = [
 {path: '', redirectTo: '/home', pathMatch: 'full'},
 {path: 'home', component: HomePageComponent},
 {path: 'products', component: ProductsPageComponent},
 {path: 'profile', component: ProfilePageComponent},
 {path: 'offer', component: OfferPageComponent},
 {path: 'contact', component: ContactPageComponent},
 {path: '404', component: NotFoundPageComponent},
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
