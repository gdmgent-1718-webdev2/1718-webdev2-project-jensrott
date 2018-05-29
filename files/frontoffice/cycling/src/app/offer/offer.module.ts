import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { OfferPageComponent } from './pages/offer-page/offer-page.component';
import { ProfileModule } from '../profile/profile.module';

@NgModule({
  imports: [
    CommonModule,
    ProfileModule,
  ],
  declarations: [OfferPageComponent],
  exports: [OfferPageComponent],
})
export class OfferModule { }
