import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

/* Components */
import { HeaderComponent } from './components/header/header.component';
import { NotFoundPageComponent } from './pages/not-found-page/not-found-page.component';
import { FooterComponent } from './components/footer/footer.component';

@NgModule({
  imports: [
    CommonModule
  ],
  declarations: [
    HeaderComponent,
    NotFoundPageComponent,
    FooterComponent,
  ],
  exports: [
    HeaderComponent,
    NotFoundPageComponent,
    FooterComponent,
  ],
})
export class CoreModule { }
