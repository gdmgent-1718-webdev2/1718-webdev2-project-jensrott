import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { OwnAuctionsPageComponent } from './own-auctions-page.component';

describe('OwnAuctionsPageComponent', () => {
  let component: OwnAuctionsPageComponent;
  let fixture: ComponentFixture<OwnAuctionsPageComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ OwnAuctionsPageComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(OwnAuctionsPageComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
