import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { OfferPageComponent } from './pages/offer-page/offer-page.component';
import { ProfileModule } from '../profile/profile.module';
import { FormsModule } from '@angular/forms';

@NgModule({
  imports: [
    CommonModule,
    ProfileModule,
    FormsModule,
  ],
  declarations: [OfferPageComponent],
  exports: [OfferPageComponent],
})
export class OfferModule { }
