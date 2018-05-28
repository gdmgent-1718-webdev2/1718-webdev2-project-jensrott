import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ProfileDeleteModalComponent } from './profile-delete-modal.component';

describe('ProfileDeleteModalComponent', () => {
  let component: ProfileDeleteModalComponent;
  let fixture: ComponentFixture<ProfileDeleteModalComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ProfileDeleteModalComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ProfileDeleteModalComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
