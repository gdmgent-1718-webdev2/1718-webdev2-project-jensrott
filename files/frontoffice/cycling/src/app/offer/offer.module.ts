import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { OfferPageComponent } from './pages/offer-page/offer-page.component';

@NgModule({
  imports: [
    CommonModule
  ],
  declarations: [OfferPageComponent],
  exports: [OfferPageComponent],
})
export class OfferModule { }
